<?php
namespace app\controller;

use app\BaseController;
class Common extends BaseController
{
    /**
     * url地址解析数据
     */
    public function search_url(){
        try{
            if (request()->post()){
                $params = request()->post();
                $res = json_decode($this->url_crawler($params['url']),true);
                if ($res['code'] == 200){
                    return json(['code'=>0,'msg'=>'ok','data'=>$res['result']]);
                }else{
                    return json(['code'=>-1,'msg'=>'error','data'=>$res['result']]);
                }
            }else{
                return json(['code'=>-1,'msg'=>'error','message'=>'访问错误']);
            }
        }catch (\Exception $e){
            return json(['code'=>-1,'msg'=>'error','message'=>$e->getMessage()]);
        }
    }

    private static function url_crawler($url){
        $request_url = 'http://18.163.175.242:8033/api/crawler';
        $params['url'] = $url;
        return post_json_data($request_url,json_encode($params['url']));
    }
}
