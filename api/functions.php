<?php
header("Access-Control-Allow-Origin: *");
$conn = mysqli_connect("localhost", "db_user", "db_pass", "db_name");
function Login($req)
{
    extract($req);
    $data = ["error" => true];
    try {
        $query = mysqli_query($GLOBALS["conn"], "SELECT * FROM `user` where `email`='$email' AND `password`='$pwd'");
        if ($row = mysqli_fetch_assoc($query)) {
            $data = $row;
            $data['error'] = false;
        } else $data["error_msg"] = "Error: Wrong Email or Password";
    } catch (exception $ex) {
        $data["error_msg"] = "Error: " . mysqli_error($GLOBALS["conn"]);
    }
    return $data;
}

function GetAmount($id)
{
    $query = mysqli_query($GLOBALS["conn"], "SELECT amount FROM `user` where `id`='$id'");
    $row = mysqli_fetch_assoc($query);
    return ["amount" => $row['amount']];
}

function GetTeam($invitation_code)
{
    $temp_data = [];
    $i = 0;
    try {
        $query = mysqli_query($GLOBALS["conn"], "SELECT first_name, last_name, email, invitation_code, country, amount FROM `user` where `refferd_by`='$invitation_code'");
        while ($row = mysqli_fetch_assoc($query)) {
            $i++;
            $row['sr'] = $i.".";
            array_push($temp_data, $row);
        }
        $data["error"] = false;
        $data["data"] = $temp_data;
        $data["msg"] = "Successfully Fetched";
    } catch (exception $ex) {
        $data["msg"] = "backend side error";
    }
    return $data;
}

function GetTRC()
{
    $query = mysqli_query($GLOBALS["conn"], "SELECT `trc_id` FROM `admin`");
    $row = mysqli_fetch_assoc($query);
    return ["trc" => $row['trc_id']];
}

function GetWA()
{
    $query = mysqli_query($GLOBALS["conn"], "SELECT `whatsapp` FROM `admin`");
    $row = mysqli_fetch_assoc($query);
    return ["whatsapp" => $row['whatsapp']];
}

function GetTelegram()
{
    $query = mysqli_query($GLOBALS["conn"], "SELECT `telegram` FROM `admin`");
    $row = mysqli_fetch_assoc($query);
    return ["telegram" => $row['telegram']];
}

function SaveData($table, $array)
{
    $data = ["error" => true];
    foreach ($array as $key => $value) {
        $array[$key] = mysqli_real_escape_string($GLOBALS['conn'], $value);
    }
    $keys = array_keys($array);
    $values = array_values($array);
    $keys = "`" . implode("`, `", $keys) . "`";
    $values = "'" . implode("', '", $values) . "'";
    try {
        $query = mysqli_query($GLOBALS['conn'], "INSERT INTO $table($keys) VALUES ($values)");
        if ($query) {
            $last_id = mysqli_insert_id($GLOBALS['conn']);
            $data['error'] = false;
            $data['new_id'] = $last_id;
            $data['msg'] = "Inserted successfully.";
        }
    } catch (exception $ex) {
        $data["msg"] = "Error: " . mysqli_error($GLOBALS["conn"]);
    }
    return json_encode($data);
}

function SaveDataS($table, $array)
{
    $data = ["error" => true];
    foreach ($array as $key => $value) {
        $array[$key] = mysqli_real_escape_string($GLOBALS['conn'], $value);
    }
    $keys = array_keys($array);
    $values = array_values($array);
    $keys = "`" . implode("`, `", $keys) . "`";
    $values = "'" . implode("', '", $values) . "'";
    try {
        $query = mysqli_query($GLOBALS['conn'], "INSERT INTO $table($keys) VALUES ($values)");
        if ($query) {
            $last_id = mysqli_insert_id($GLOBALS['conn']);
            $data['error'] = false;
            $data['new_id'] = $last_id;
            $data['invitation_code'] = 'marcilim-' . $data['new_id'];
            mysqli_query($GLOBALS['conn'], "UPDATE `user` SET `invitation_code`='marcilim-$last_id' WHERE `id`='$last_id'");
            $data['msg'] = "Inserted successfully.";
        }
    } catch (exception $ex) {
        $data["msg"] = "Error: " . mysqli_error($GLOBALS["conn"]);
    }
    return json_encode($data);
}

function GetOrders($lvl, $lmt)
{
    $temp_data = [];
    try {
        $query = mysqli_query($GLOBALS["conn"], "SELECT * FROM `orders` ORDER BY RAND() LIMIT $lmt");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($temp_data, $row);
        }
        $data["error"] = false;
        $data["data"] = $temp_data;
        $data["msg"] = "Successfully Fetched";
    } catch (exception $ex) {
        $data["msg"] = mysqli_error($GLOBALS["conn"]);
    }
    return $data;
}

function GetTasks($uid, $lvl)
{
    $data = ["error" => true];
    $temp_data = [];
    // $data['data'] = GetOrders($lvl);
    try {
        $prc = GetAmount($uid)["amount"];
        $quan = 0;
        if ($prc >= 50 && $prc < 100) :
            $lvl = 1;
            $quan = 20;
            $lmt = 10;
            $per = 0.26;
        elseif ($prc >= 100 && $prc < 500) :
            $lvl = 2;
            $quan = 19;
            $lmt = 15;
            $per = 0.30;
        elseif ($prc >= 500 && $prc < 1000) :
            $lvl = 3;
            $quan = 23;
            $lmt = 20;
            $per = 0.35;
        elseif ($prc >= 1000 && $prc < 10000) :
            $lvl = 4;
            $quan = 32;
            $lmt = 30;
            $per = 0.40;
        elseif ($prc >= 10000) :
            $lvl = 5;
            $quan = 30;
            $lmt = 30;
            $per = 0.50;
        endif;
        $statement = "
        SELECT user_order.id,`u_id`,`o_id`,`date`,user_order.lvl,`title`,`cat`,`rating`,`price`,`img` FROM `user_order` 
        RIGHT JOIN orders ON user_order.o_id=orders.id WHERE `u_id` = '$uid' AND user_order.lvl = '$lvl'";
        $query = mysqli_query($GLOBALS["conn"], $statement);
        $i = 0;
        $orderCount = mysqli_num_rows($query) ? mysqli_num_rows($query) : 0;
        if ($orderCount == $lmt) {
            while ($row = mysqli_fetch_assoc($query)) {
                $prr = $prc / 35 / $quan;
                if ($i % 5 == 0) {
                    $row['price'] = round($prr * 100 / $per + 3, 2);
                } else if ($i % 5 == 1) {
                    $row['price'] = round($prr * 100 / $per - 10, 2);
                } else if ($i % 5 == 2) {
                    $row['price'] = round($prr * 100 / $per - 6, 2);
                } else if ($i % 5 == 3) {
                    $row['price'] = round($prr * 100 / $per + 11, 2);
                } else {
                    $row['price'] = round($prr * 100 / $per + 2, 2);
                }
                $i++;
                array_push($temp_data, $row);
            }
            $data["error"] = false;
            $data["data"] = $temp_data;
            $data["msg"] = "Successfully Fetched";
        } else {
            $lmt = $lmt - $orderCount;
            foreach (GetOrders($lvl, $lmt)['data'] as $key => $order) {
                $oid = $order['id'];
                $query = mysqli_query($GLOBALS["conn"], "INSERT INTO `user_order`(`u_id`, `o_id`, `lvl`) VALUES ('$uid','$oid','$lvl')");
            }
            return GetTasks($uid, $lvl);
        }
    } catch (exception $ex) {
        $data["error_msg"] = mysqli_error($GLOBALS["conn"]);
    }
    return $data;
}

function TaskCompletion($res)
{
    $data = ["error" => true];
    date_default_timezone_set("Asia/Karachi");
    $date = date("Y-m-d H:i:s");
    extract($res);
    $quan = getQuan($task_id);
    $amount = GetAmount($uid)['amount'];
    if (alreadyDone($task_id)) return ['error' => true, 'msg' => 'Already Done'];
    $comPrice = $amount / 35 / $quan;
    $amount = $amount + $comPrice;
    $query = mysqli_query($GLOBALS['conn'], "UPDATE `user` SET `amount` = '$amount' WHERE `id`='$uid'");
    $r_earn = $comPrice;
    $r_date = date("Y-m-d");
    $r_1 = 0;
    $r_2 = 0;
    $r_3 = 0;
    if ($query) {
        $query = mysqli_query($GLOBALS['conn'], "UPDATE `user_order` SET `date` = '$date' WHERE `id`='$task_id'");
        if ($query) {
            $query = mysqli_query($GLOBALS['conn'], "SELECT `refferd_by` FROM `user` WHERE `id` = '$uid'");
            if ($row = mysqli_fetch_assoc($query)) {
                $refferd_by = $row['refferd_by'];
                $amount = mysqli_query($GLOBALS['conn'], "SELECT `amount` FROM `user` WHERE `invitation_code` = '$refferd_by'");
                $amount = mysqli_fetch_assoc($amount);
                $amount = $amount['amount'];
                $amount = $amount + $comPrice * 12 / 100;
                $r_1 = $comPrice * 12 / 100;
                $query = mysqli_query($GLOBALS['conn'], "UPDATE `user` SET `amount` = '$amount' WHERE `invitation_code` = '$refferd_by'");
                $query = mysqli_query($GLOBALS['conn'], "SELECT `refferd_by` FROM `user` WHERE `invitation_code` = '$refferd_by'");
                if ($row = mysqli_fetch_assoc($query)) {
                    $refferd_by = $row['refferd_by'];
                    $amount = mysqli_query($GLOBALS['conn'], "SELECT `amount` FROM `user` WHERE `invitation_code` = '$refferd_by'");
                    $amount = mysqli_fetch_assoc($amount);
                    $amount = $amount['amount'];
                    $amount = $amount + $comPrice * 6 / 100;
                    $r_2 = $comPrice * 6 / 100;
                    $query = mysqli_query($GLOBALS['conn'], "UPDATE `user` SET `amount` = '$amount' WHERE `invitation_code` = '$refferd_by'");
                    $query = mysqli_query($GLOBALS['conn'], "SELECT `refferd_by` FROM `user` WHERE `invitation_code` = '$refferd_by'");
                    if ($row = mysqli_fetch_assoc($query)) {
                        $refferd_by = $row['refferd_by'];
                        $amount = mysqli_query($GLOBALS['conn'], "SELECT `amount` FROM `user` WHERE `invitation_code` = '$refferd_by'");
                        $amount = mysqli_fetch_assoc($amount);
                        $amount = $amount['amount'];
                        $amount = $amount + $comPrice * 3 / 100;
                        $r_3 = $comPrice * 3 / 100;
                        $query = mysqli_query($GLOBALS['conn'], "UPDATE `user` SET `amount` = '$amount' WHERE `invitation_code` = '$refferd_by'");
                    }
                }
            }
            $data['error'] = false;
            $data['msg'] = "Update successfully.";
            $r_query = mysqli_query($GLOBALS['conn'], "SELECT * FROM `balance_report` WHERE `user_id` = '$uid' AND `date` = '$r_date'");
            if (mysqli_num_rows($r_query)>0){
                mysqli_query($GLOBALS['conn'], "UPDATE `balance_report` SET `earning_report` = `earning_report` + '$r_earn', `to_1st` = `to_1st` + '$r_1', `to_2nd` = `to_2nd` + '$r_2', `to_3rd` = `to_3rd` + '$r_3' WHERE `user_id` = '$uid' AND `date` = '$r_date'");
            } else {
                mysqli_query($GLOBALS['conn'], "INSERT INTO `balance_report`(`user_id`, `earning_report`, `to_1st`, `to_2nd`, `to_3rd`, `date`) VALUES ('$uid', '$r_earn', '$r_1', '$r_2', '$r_3', '$r_date')");
            }
        } else {
            $data['msg'] = mysqli_error($conn);
        }
    } else {
        $data['msg'] = mysqli_error($conn);
    }
    return $data;
}

function alreadyDone($task_id)
{
    $query = mysqli_query($GLOBALS["conn"], "SELECT `date` FROM `user_order` where `id`='$task_id'");
    $row = mysqli_fetch_assoc($query);
    $date = $row['date'];
    $time = strtotime($date);
    $task_date = date('Y-m-d', $time);
    $current_date = date('Y-m-d');
    if ($task_date == $current_date) return true;
    else return false;
}

function getQuan($task_id)
{
    $query = mysqli_query($GLOBALS["conn"], "SELECT lvl FROM `user_order` where `id`='$task_id'");
    $row = mysqli_fetch_assoc($query);
    $lvl = $row['lvl'];
    $quan = 0;
    if ($lvl == 1) $quan = 20;
    else if ($lvl == 2) $quan = 19;
    else if ($lvl == 3) $quan = 23;
    else if ($lvl == 4) $quan = 32;
    else if ($lvl == 5) $quan = 30;
    return $quan;
}

function updateData($table, $array, $pkey)
{
    $_value = $array['pkey'];
    unset($array['primary']);
    $keys = "";
    foreach ($array as $key => $value) {
        $keys .= "`$key`='$value', ";
    }
    $keys = rtrim($keys, ", ");
    $query = mysqli_query($GLOBALS['conn'], "UPDATE `$table` SET $keys WHERE `$pkey`='$_value'");
    if ($query) {
        $array['error'] = false;
        $array['msg'] = "Update successfully.";
        return $array;
    }
    $array['error'] = true;
    $array['msg'] = "Error: " . mysqli_error($GLOBALS['conn']);
    return $array;
    // return "UPDATE `$table` SET $keys WHERE `$_key`='$_value'";
}
