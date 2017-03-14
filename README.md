# page
一个简单易用的分页类，支持自定义标签。
```php
include LIB_PATH.'page/page.php';
$config = array(
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

$page = new page($config);	//如果$config是字符串，将尝试从配置文件中获取

$page   ->setCurrent(6)								//设置当前页码
		->setUrl('www.baidu.com?pageNum=_pageNum')  //设置url
		->setPerNum(3)								//设置每页显示数量
		->setTotalNum(30);							//设置总的信息条数
$res = $page->getlinkArr();							//获取未经配置信息过滤的分页数组
$res = $page->getFilterLink();						//经过配置信息过滤的分页数组
$res = $page->getLinkHtml(false);					//获取未经配置信息过滤的分页html 数组或字符串
$res = $page->getFilterHtml(false);					//获取经过配置信息过滤的分页html 数组或字符串

```
