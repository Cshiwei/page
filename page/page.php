<?php

/**
 * Created by PhpStorm.
 * User: caosw
 * Date: 2017/3/13
 * Time: 10:34
 * 用于定制分类链接的类
 */
class page
{
    /**基础url
     * @var
     */
    private $baseUrl;

    /**总条数
     * @var
     */
    private $totalNum;

    /**每页显示条数
     * @var
     */
    private $perNum;

    /**当前页码
     *
     */
    private $current;

    /**最终的分页链接
     * @var
     */
    private $linkHtml;

    /**未经配置信息过滤的数组
     * @var
     */
    private $linkArr;

    /**经过配置信息过滤的数组
     *
     */
    private $filterLink;

    /**以数组形式返回的分页信息普通链接的数量（当前页，左边最多五个，右边最多五个）
     * @var int
     */
    private $commonNum=5;

    /**最终的分页数组
     * @var
     */
    private $pageArr;

    /**分页类配置信息
     * 优先级，构造函数 > 配置文件 最后数组合并配置文件里的default设置
     * @var
     */
    private $defaultConfig = array(
        'showPage'    => '2',                   //当前页左右两边显示页码数量
        'commonOpen'  => '<li>',                //普通页的开启标签
        'commonClose' =>  '</li>',              //普通页的闭合标签

        'currentOpen' => '<li>',                //当前页的开启标签
        'currentClose' => '</li>',              //当前页的闭合标签

        'isFirst'   => true,                     //是否显示首页链接
        'firstTrigger' => 3,                     //超过多少页触发显示首页链接
        'firstSign' => '首页',                    //首页链接的字符显示 << first 等等
        'firstOpen' =>  '<li>',                  //首页包裹元素的开启标签
        'firstClose'=>  '</li>',                 //首页包裹元素的闭合标签

        'isLast'    => 'true',                 //是否显示尾页
        'lastTrigger' => 3,                    //超过多少页触发显示尾页链接
        'lastSign'  => '最后一页',               //尾页字符显示
        'lastOpen'  =>  '<li>',                //尾页的开启标签
        'lastClose' => '</li>',                //尾页的闭合标签

        'isPre'     =>  'true',                 //是否显示上一页
        'preTrigger'=>  3,                      //超过多少页触发显示上一页链接
        'preSign'   =>  '上一页',                //上一页的标识符
        'preOpen'   =>  '<li>',                 //上一页开启标签
        'preClose'  =>  '</li>',                //上一页闭合标签

        'isNext'    =>  'true',                  //是否显示下一页
        'nextTrigger' => 3,                      //超过多少页触发显示下一页链接
        'nextSign'  =>  '下一页',                 //下一页的标识符
        'nextOpen'  =>  '<li>',                 //下一页开启标签
        'nextClose' =>  '</li>'                 //下一页闭合标签

    );

    /**最终配置信息 优先使用用户指定规则，用户未指定的使用默认规则defaultConfig
     * @var
     */
    private $config;

    /**保存分页信息的数组的文件
     * @var string
     */
    private $configPath='.../config/page.php';


    /**构造函数可以再次添加配置数组
     * page constructor.
     * @param array $config
     */
    public function __construct(array $config=array())
    {
        $this->_setConfig($config);
    }

    /*获取当前使用的配置信息
     *
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**设置数据总条数
     * @param $totalNum
     * @return $this
     */
    public function setTotalNum($totalNum)
    {
        $totalNum = intval($totalNum);
        if($totalNum <=0 )
            $this->totalNum = 0;
        else
            $this->totalNum = $totalNum;

        return $this;
    }

    /**设置每页显示条数
     * @param $perNum
     * @return $this
     */
    public function setPerNum($perNum)
    {
        $perNum = intval($perNum);
        if($perNum <= 0)
            $this->perNum = 0;
        else
            $this->perNum = $perNum;

        return $this;
    }

    /**设置当前页码
     * @param mixed $current
     * @return $this
     */
    public function setCurrent($current)
    {
        if(intval($current) <= 0)
            $this->current = 0;
        else
            $this->current = $current;
        return $this;
    }

    /**设置分页链接url
     * @param $url
     * @return $this
     */
    public function setUrl($url='')
    {
        if($url != '')
        {
            $this->baseUrl = $url;
        }
        else
        {
            //自动获取url
        }
        return $this;
    }

    /**获取分页链接的html代码
     *
     */
    public function getLink()
    {
        return $this->link;
    }

    /**获取分页相关的数组信息
     *未经被配置信息过滤
     */
    public function getLinkArr()
    {
        $this->_setLinkArr();
        dump($this->linkArr);
        return $this->linkArr;
    }

    /**获取经过配置信息过滤的数组
     *
     */
    public function getFilterLink()
    {
        return $this->filterLink;
    }

    /**
     * 拼接分页链接信息
     */
    private function _exe()
    {
        $totalNum = $this->totalNum;
        $perNum = $this->perNum;
        if($totalNum == 0 || $totalNum<=$perNum)
            return false;
    }

    /**获取配置文件中指定的数组
     * @param $appoint
     */
    private function _setConfig($appoint)
    {
        $config = array();
        $default = array();

        if(is_array($appoint))
            $appoint = array_filter($appoint);

        if(file_exists($this->configPath))
        {
            include "{$this->configPath}";
            $default = array_filter($config['default']);

            if(is_string($appoint))
                $appoint = array_filter($config[$appoint]);
        }

        $this->config = array_merge($this->defaultConfig,$default,$appoint);
    }

    /**设置分页链接html代码
     *
     */
    private function _setLinkHtml()
    {

    }

    /**设置分页相关数组数据
     *
     */
    private function _setLinkArr()
    {
        $totalNum = $this->totalNum;
        $perNum = $this->perNum;

        if($totalNum == 0 || $totalNum <= $perNum)
        {
            $this->linkArr = array();
        }
        else
        {
            $totalPage = ceil($totalNum / $perNum);
            $firstLink = $this->_getLink(1);
            $lastLink = $this->_getLink($totalPage);
            $current = $this->_getCurrent();
            $preLink = ($current==1) ? '' : $this->_getLink($current - 1);
            $nextLink = ($current==$totalPage) ? '' : $this->_getLink($current+1);
            $commonLink = $this->_getCommomLink($totalPage,$current);
            $this->linkArr = array(
                'first'     =>  $firstLink,
                'lastLink' =>  $lastLink,
                'current'   =>  $current,
                'preLink'   =>  $preLink,
                'nextLink'  =>  $nextLink,
                'commonLink'=>  $commonLink
            );
        }
    }

    /**获得普通页的链接数组
     * @param $totalPage     总页数
     * @param string|当前页码 $current 当前页码
     * @return bool
     */
    private function _getCommomLink($totalPage,$current='')
    {
        $arr = array();
        $current = $current ? $current : $this->current;
        $maxLenth = $this->commonNum;
        for ($i=1;$i<=$maxLenth;$i++)
        {
            $prePage = $current - $i;
            $nextPage = $current + $i;
            if($prePage > 0)
                $arr[$prePage] = $this->_getLink($prePage);
            if($nextPage <= $totalPage)
                $arr[$nextPage] = $this->_getLink($nextPage);
        }
        $arr[$current] = $this->_getLink($current);
        ksort($arr);
        return $arr;
    }

    /**根据url以及页码获取分页链接
     * @param $pageNum
     * @return mixed
     */
    private function _getLink($pageNum)
    {
        if($this->baseUrl == '')
            return '';
        $pageNum = intval($pageNum);
        if($pageNum<=0)
            $pageNum = 1;

        $link = str_replace('_pageNum',$pageNum,$this->baseUrl);

        return $link;
    }

    /**获取当前页码
     */
    private function _getCurrent()
    {
        return $this->current;
    }
}