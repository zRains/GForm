# GForm

## ![example](https://img.shields.io/badge/version-0.0.1-brightgreen.svg)

### 关于 GForm

这是一个运行于[PocketMine-MP](https://pmmp.io/)上的一个插件，可以帮助你快速创建游戏内的表单。包括三种类型的表单(详细说明点击相应表单类型即可)：

- **Custom**
- **Modal**
- **Form**

### 如何使用

#### 第一步

你可以直接下载[Releases](https://github.com/zRains/GForm/releases)里面已经打包好的`.phar`文件放到你的 plugins 文件夹内，调用 API 即可。

**或者**

直接下载源码通过`Devtools`加载。这对开发者来说是推荐的。

#### 第二步

在相应文件中调用插件：

```php
$this->Form = $this->getServer()->getPluginManager()->getPlugin("GForm");
```

### 使用 API

#### 创建 Custom 型表单

```php
// $Title 为标题，$Callback 为回调函数。
$Example = $this->Form->CreateCustomForm(string $Title, ?callable $Callback);
// 配置完成后向玩家展示表单，$player instanceof Player == true。
$Example->sendForm($player);
```

**表单组件和应用示例**

```php
/*
 * 标题：Title-必须。在刚开始创建的时候就可以设置标题，调用此方法后以此方法为最后标题。
 * 参数1：标题内容。string
 */
$Example->setTitle = "这是一个标题 | This is a Title";

/*
 * 滑块：Slider-可选。
 * 参数1：显示在滑块上的标签。string
 * 参数2：滑块滑动最小值，默认0。int
 * 参数3：滑块滑动最大值，默认100。int
 * 参数4：滑块最先显示的默认值，默认0。int
 */
$Example->setSlider("这是一个滑块 | This is a Slider", 0, 100, 0);

/*
 * 标签：Label-可选。
 * 参数1：标签内容。
 */
$Example->setLabel("这是一个标签 | This is a label");

/*
 * 步骤条：Step_slider-可选。
 * 参数1：展示在步骤条上面的标签。string
 * 参数2：一个信息数组（不会显示在表单里，只有回调时才有用）。array
 */
$Example->setSteps("这是一个步骤条 | This is a Stepslider", ["1","2","3"]);

/*
 * 开关:Toggle-可选。
 * 参数1:展示在开关前的标签。string
 * 参数2：默认展示开关状态，默认false。bool
 */
$Example->setToggle("这是一个开关 | This is a Toggle", false);

/*
 * 下拉菜单：Dropdown-可选。
 * 参数1：展示在下拉菜单上的标签。string
 * 参数2:一个包含菜单数据的数组。array
 */
$Example->setDropdown("这是一个下拉菜单 | This is Dropdown", ["item1","item2"]);
```

#### 创建 Modal 型表单

```php
// $Title 为标题，$Callback 为回调函数。
$Example = $this->Form->CreateModalForm(string $Title, ?callable $Callback);
// 配置完成后向玩家展示表单，$player instanceof Player == true。
$Example->sendForm($player);
```

**表单组件和应用示例**

```php
/*
 * 标题：Title-必须。
 * 参数1：标题内容。string
 */
$Example->setTitle = "这是一个标题 | This is a Title";

/*
 * 内容：Content-必须。
 * 参数1：展示在表单里的内容。string
 */
$Example->setContent("这是内容 | This is Content");

/*
 * 按钮组：Buttons-必须。
 * 参数1：一个包含两个按钮内容的数组。array
 */
$Example->setButton(["正确 | Yes", "错误 | No"]);
```

#### 创建 Form 型表单

```php
// $Title 为标题，$Callback 为回调函数。
$Example = $this->Form->CreateSimpleForm(string $Title, ?callable $Callback);
// 配置完成后向玩家展示表单，$player instanceof Player == true。
$Example->sendForm($player);
```

**表单组件和应用示例**

```php
/*
 * 标题：Title-必须。
 * 参数1：标题内容。string
 */
$Example->setTitle = "这是一个标题 | This is a Title";
/*
 * 内容：Content-必须。
 * 参数1：展示在表单里的内容。string
 */
$Example->setContent("这是内容 | This is Content");

/*
 * 按钮：Buttons-至少一个，可多个。
 * 参数1：显示在按钮上的标签。string
 * 参数2：显示在按钮前的图片的URL或Path。string
 * 参数3：参数2类型，可选url | path，默认url。string
 */
$Example->setButton("这是一个按钮 | This is a Button", "https://example.com/example.jpg", "url");
```

### 关于回调函数

没有这个表单就只是展示的东西。

**回调函数示例**

```php
// $player 为操作表单的玩家对象。$data 为操作表单后（表单被关闭）返回的数据。
$Example = $this->plugin->Form->CreateCustomForm("Example Form", function (Player $player, $data) {
    $this->plugin->getLogger()->info(var_dump($data));
    // .... 你想做的事。
});
```
**返回数据说明**

Custom型表单：返回一个数组。

Modal型表单：返回布尔值。

Form型表单：返回被点击按钮的索引。

### 表单类型介绍
#### Custom
![Custom1](https://github.com/zRains/GForm/blob/master/img/Custom1.jpg?raw=true)
---
![Custom2](https://github.com/zRains/GForm/blob/master/img/Custom2.jpg?raw=true)
#### Modal
![Modal](https://github.com/zRains/GForm/blob/master/img/Model.jpg?raw=true)
#### Form
![Form](https://github.com/zRains/GForm/blob/master/img/Form.jpg?raw=true)