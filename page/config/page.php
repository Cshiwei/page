<?php
/**
 * Created by PhpStorm.
 * User: caosw
 * Date: 2017/3/13
 * Time: 10:50
 * 分页类配置文件
 */
/**默认配置数组，用户未指定的参数将使用该配置
 *如果该默认配置项不存在或者少参数，将实用page类里的defaultConfig里的配置
 * 优先级 用户指定 > default配置文件 > defaultConfig变量
 */
$_page['default'] = array(
    'showPage'    => '2',                   //当前页左右两边显示页码数量
    'commonOpen'  => '<li>',                //普通页的开启标签
    'commonClose' =>  '</li>',              //普通页的闭合标签

    'currentOpen' => '<li class="currentPage">',                //当前页的开启标签
    'currentClose' => '</li>',              //当前页的闭合标签

    'isFirst'   => true,                     //是否显示首页链接
    'firstTrigger' => 3,                     //超过多少页触发显示首页链接
    'firstSign' => '首页',                    //首页链接的字符显示 << first 等等
    'firstOpen' =>  '<li class="firstPage">',                  //首页包裹元素的开启标签
    'firstClose'=>  '</li>',                 //首页包裹元素的闭合标签

    'isLast'    => 'true',                 //是否显示尾页
    'lastTrigger' => 3,                    //超过多少页触发显示尾页链接
    'lastSign'  => '最后一页',               //尾页字符显示
    'lastOpen'  =>  '<li class="lastPage">',                //尾页的开启标签
    'lastClose' => '</li>',                //尾页的闭合标签

    'isPre'     =>  'true',                 //是否显示上一页
    'preTrigger'=>  3,                      //超过多少页触发显示上一页链接
    'preSign'   =>  '上一页',                //上一页的标识符
    'preOpen'   =>  '<li class="prePage">',                 //上一页开启标签
    'preClose'  =>  '</li>',                //上一页闭合标签

    'isNext'    =>  'true',                  //是否显示下一页
    'nextTrigger' => 3,                      //超过多少页触发显示下一页链接
    'nextSign'  =>  '下一页',                 //下一页的标识符
    'nextOpen'  =>  '<li class="nextPage">',                 //下一页开启标签
    'nextClose' =>  '</li>'                 //下一页闭合标签
);

/**
 * 用户指定配置项，根据索引获取配置信息
 * 直接复制defaul配置，将不需要的覆盖掉，不需要修改的为空，或者不操作该信息即可
 */
$_page['test'] = array(
    'showPage'    => '2',                   //当前页左右两边显示页码数量
    'commonOpen'  => '<li>',                //普通页的开启标签
    'commonClose' =>  '</li>',              //普通页的闭合标签

    'currentOpen' => '<li class="currentPage">',                //当前页的开启标签
    'currentClose' => '</li>',              //当前页的闭合标签

    'isFirst'   => true,                     //是否显示首页链接
    'firstTrigger' => 3,                     //超过多少页触发显示首页链接
    'firstSign' => '首页',                    //首页链接的字符显示 << first 等等
    'firstOpen' =>  '<li class="firstPage">',                  //首页包裹元素的开启标签
    'firstClose'=>  '</li>',                 //首页包裹元素的闭合标签

    'isLast'    => 'true',                 //是否显示尾页
    'lastTrigger' => 3,                    //超过多少页触发显示尾页链接
    'lastSign'  => '最后一页',               //尾页字符显示
    'lastOpen'  =>  '<li class="lastPage">',                //尾页的开启标签
    'lastClose' => '</li>',                //尾页的闭合标签

    'isPre'     =>  'true',                 //是否显示上一页
    'preTrigger'=>  3,                      //超过多少页触发显示上一页链接
    'preSign'   =>  '上一页',                //上一页的标识符
    'preOpen'   =>  '<li class="prePage">',                 //上一页开启标签
    'preClose'  =>  '</li>',                //上一页闭合标签

    'isNext'    =>  'true',                  //是否显示下一页
    'nextTrigger' => 3,                      //超过多少页触发显示下一页链接
    'nextSign'  =>  '下一页',                 //下一页的标识符
    'nextOpen'  =>  '<li class="nextPage">',                 //下一页开启标签
    'nextClose' =>  '</li>'                 //下一页闭合标签
);

