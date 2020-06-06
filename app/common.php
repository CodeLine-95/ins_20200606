<?php
// 应用公共文件

/**
 * post 发送JSON 格式数据
 * @param $url string URL
 * @param $data_string string 请求的具体内容
 * @return array
 *        code 状态码
 *        result 返回结果
 */
function post_json_data($url,$data_string){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Content-Length: ' . strlen($data_string))
    );
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();
//    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return $return_content;
}
