<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜狐网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.aa.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: IT宇宙人
 * Date: 2015-09-09
 */
namespace app\admin\validate;
use think\Validate;
class GoodsCategory extends Validate {   
    // 验证规则
    protected $rule = [
        ['name','require','分类名称必须填写'],
        ['sort_order', 'number', '排序必须为数字'],     
    ];    
}
