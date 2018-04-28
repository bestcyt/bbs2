<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function root()
    {
        $test = User::where('id',1)->first()->toArray();
        return view('pages.root');
    }


    public function test(){
        $all = collect([1, 2, 3])->all();

        //二维数组的平均值
        $average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');
        $average = collect([1, 1, 2, 4])->avg();

        $collection = collect([1, 2, 3, 4, 5, 6, 7]);
        //指定个大小
        $chunks = $collection->chunk(3);
        $chunks->toArray();

        //合并
        $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
        $collapsed = $collection->collapse();
        $collapsed->all();

        //合并键值数组
        $collection = collect(['name', 'age']);
        $combined = $collection->combine(['George', 29]);
        $combined->all();

        //判断是否包含
        $collection = collect(['name' => 'Desk', 'price' => 100]);
        $collection->contains('Desk');
        $collection->contains('New York');
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
        ]);
        $collection->contains('product', 'Bookcase'); //flase

        //返回不存在的玩意
        $collection = collect([1, 2, 3, 4, 5]);
        $diff = $collection->diff([2, 4, 6, 8]);
        $diff->all();

        //返回不存在的东西
        $collection = collect([
            'color' => 'orange',
            'type' => 'fruit',
            'remain' => 6
        ]);

        $diff = $collection->diffAssoc([
            'color' => 'yellow',
            'type' => 'fruit',
            'remain' => 3,
            'used' => 6
        ]);

        $diff->all();

        $test = [];
        $test = $collection->each(function ($item, $key) use ($test) {
            if ($key == 'remain'){
                return false;
            }
        });

        //every 验证真实
        $every = collect([1, 2, 3, 4])->every(function ($value, $key) {
            return $value >= 1;
        });

        //filte 返回过滤后的
        $collection = collect([1, 2, 3, 4]);
        $filtered = $collection->filter(function ($value, $key) {
            return $value > 2;
        });
        //如果没有提供回调函数，集合中所有返回 false 的元素都会被移除：
        $collection = collect([1, 2, 3, null, false, '', 0, []]);
        $collection->filter()->all();

        //回调修改 flatmap
        $collection = collect([
            ['name' => 'Sally'],
            ['school' => 'Arkansas'],
            ['age' => 28]
        ]);
        $flattened = $collection->flatMap(function ($values) {
            return array_values($values);
        });
        $flattened->all();

        //多维转为一维
        $collection = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']]);
        $flattened = $collection->flatten();
        $flattened->all();
        $collection = collect([
            'Apple' => [
                ['name' => 'iPhone 6S', 'brand' => 'Apple'],
            ],
            'Samsung' => [
                ['name' => 'Galaxy S7', 'brand' => 'Samsung']
            ],
        ]);
        $products = $collection->flatten(1);
        //传入深度参数能让你限制设置返回数组的层数
        $products->values()->all();

        //两级反转，键值相反
        $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
        $flipped = $collection->flip();
        $flipped->all();

        //移除某个
        $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);
        $collection->forget('name');
        $collection->all();

        //forpage
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $chunk = $collection->forPage(3, 4);
        $chunk->all();

        //groupby
        $collection = collect([
            ['account_id' => 'account-x10', 'product' => 'Chair'],
            ['account_id' => 'account-x10', 'product' => 'Bookcase'],
            ['account_id' => 'account-x11', 'product' => 'Desk'],
        ]);
        $grouped = $collection->groupBy('account_id');
        $grouped->toArray();

        //map 修改item
        $collection = collect(['cc'=>9, 2, 3, 4, 5]);
        $multiplied = $collection->map(function ($item, $key) {
            if ($key == 0){
                return $item * 2;
            }else{
                return $item;
            }
        });
        $multiplied->all();

        //移除指定键
        $collection = collect(['product_id' => 'prod-100', 'name' => 'Desk','test'=>'asdfasdf']);
        $collection->pull('test');
        $collection->all();

        //循环加数组的值，可代替foreach的相加
        $collection = collect([1, 2, 3]);
        $total = $collection->reduce(function ($carry, $item) {
            return $carry + $item;
        });

        //按条件移除过滤集合
        $collection = collect([1, 2, 3, 4]);
        $filtered = $collection->reject(function ($value, $key) {
            return $value > 1;
        });
        $filtered->all();

        //两级反转
        $collection = collect([1, 2, 3, 4, 5]);
        $reversed = $collection->reverse();
        $reversed->all();

        //返回给定值后面的部分
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $slice = $collection->slice(4);
        $slice->all();

        dd($reversed->toArray());


    }
}
