<center><img src="https://github.com/zRains/GForm/blob/master/img/icon.png?raw=true">
<div style="margin-top:10px"><img src="https://img.shields.io/badge/version-1.0.0-brightgreen.svg"></div>
</center>

Documentation | 说明文档 :

- [English version](#about-gform-hand)
- [中文](#关于-gform-hand)

### About GForm :hand:

GForm is a Plugin running on [pocketmine MP](https://pmmp.io/) Can help you quickly create in-game forms. There are three types of forms (for detailed description, click the corresponding form type):point_down:

- [**Custom**](#custom)
- [**Modal**](#modal)
- [**Form**](#form)

### How to use it :question:

#### Step one:

You can download [releases](https://github.com/zRains/GForm/releases) directly and put the packaged '. Phar' file in your plugins folder and call the API.

**Or**

Download the source code directly and load it through 'devtools'. This is recommended for developers.

#### Step two:

Call the plugin in the corresponding file:

```php
$this->Form = $this->getServer()->getPluginManager()->getPlugin("GForm");
```

### Use API

#### :point_right: Create custom form:

```php
// $Title is form title，$Callback is a callback function。
$Example = $this->Form->CreateCustomForm(string $Title, ?callable $Callback);

// Show the form to the player after configuration,$player instanceof Player == true。
$Example->sendForm($player);
```

**Form components and application examples:**

```php
/*
 * Title: Title - required. You can set the title at the beginning of creation, and use this method as the final title after calling this method.
 * Parameter 1: title content. string
 */
$Example->setTitle = "这是一个标题 | This is a Title";

/*
 * Slider: slider - optional.
 * Parameter 1: label displayed on the slider. string
 * Parameter 2: slider sliding minimum value, default: 0. Int
 * Parameter 3: maximum sliding value of slider, default :100. Int
 * Parameter 4: the default value that the slider first displays, default :0. Int
 */
$Example->setSlider("这是一个滑块 | This is a Slider", 0, 100, 0);

/*
 * Label: Label - optional.
 * Parameter 1: label content. string
 */
$Example->setLabel("这是一个标签 | This is a label");

/*
 * Step bar: step_ Slider - optional.
 * Parameter 1: the label displayed above the step bar. string
 * Parameter 2: an array of information (Only useful for callback). array
 */
$Example->setSteps("这是一个步骤条 | This is a Stepslider", ["1","2","3"]);

/*
 * Toggle: toggle - optional.
 * Parameter 1: display the label in front of the switch. string
 * Parameter 2: display switch status by default, default :false. bool
 */
$Example->setToggle("这是一个开关 | This is a Toggle", false);

/*
 * Drop down menu: dropdown - optional.
 * Parameter 1: the label displayed on the drop-down menu. string
 * Parameter 2: an array containing menu data. array
 */
$Example->setDropdown("这是一个下拉菜单 | This is Dropdown", ["item1","item2"]);
```

#### :point_right: Create modal form

```php
// $Title is form title，$Callback is a callback function。
$Example = $this->Form->CreateModalForm(string $Title, ?callable $Callback);
// Show the form to the player after configuration,$player instanceof Player == true。
$Example->sendForm($player);
```

**Form components and application examples:**

```php
/*
 * Title: Title - required.
 * Parameter 1: title content. string
 */
$Example->setTitle = "这是一个标题 | This is a Title";

/*
 * Content: content - required.
 * Parameter 1: the content displayed in the form. string
 */
$Example->setContent("这是内容 | This is Content");

/*
 * Button group: buttons - required.
 * Parameter 1: an array containing the contents of two buttons. array
 */
$Example->setButton(["正确 | Yes", "错误 | No"]);
```

#### :point_right: Create Form form

```php
// $Title is form title，$Callback is a callback function。
$Example = $this->Form->CreateSimpleForm(string $Title, ?callable $Callback);
// Show the form to the player after configuration,$player instanceof Player == true。
$Example->sendForm($player);
```

**Form components and application examples:**

```php
/*
 * Title: Title - required.
 * Parameter 1: title content. string
 */
$Example->setTitle = "这是一个标题 | This is a Title";
/*
 * Content: content - required.
 * Parameter 1: the content displayed in the form. string
 */
$Example->setContent("这是内容 | This is Content");

/*
 * Buttons: buttons - at least one, more than one.
 * Parameter 1: label displayed on the button. string
 * Parameter 2: URL or path of the image displayed in front of the button. string
 * Parameter 3: parameter 2 type, optional :URL | path, default :URL. string
 */
$Example->setButton("这是一个按钮 | This is a Button", "https://example.com/example.jpg", "url");
```

### :wrench:Configuration

:heavy_check_mark: **Config_Version：** Configuration file version.

:heavy_exclamation_mark: **Auto_Hide_Error_Form：** Failed to create a form. The error form is automatically hidden. default :false.

:heavy_check_mark: **Default_Require_Text：** The content that is automatically filled when the necessary content is empty.

:heavy_check_mark: **Step_Bar_Empty：** Fill in the default content when the step bar is empty. Default: ["E", "R", "R", "O", "R"]

:heavy_check_mark: **Dropdown_Empty：** Fill in the default content when the drop-down menu is empty. Default: ["E", "R", "R", "O", "R"]

:heavy_check_mark: **Default_Img：** When the image address is empty, the default image. Default: "textures/blocks/redstone_block.png"

:heavy_check_mark: **Color_Symbol：** Custom color symbol. Default: §

### Get table data

Returns an array containing the current table data:

```php
$Data = $Example->getFormData();
```


### About callback function

Believe me, you really need it. :hear_no_evil:

**Callback function example:**

```php
// $player is the player object of the operation form.$data Is the data returned after the form is manipulated (the form is closed).
$Example = $this->plugin->Form->CreateCustomForm("Example Form", function (Player $player, $data) {
    $this->plugin->getLogger()->info(var_dump($data));
    // .... What you want to do.
});
```

**Return \$data descriptions:**

Custom form: Returns an array.

Modal form: Returns a Boolean value.

Form type form: Returns the index of the button to be clicked.

### 关于 GForm :hand:

这是一个运行于[PocketMine-MP](https://pmmp.io/)上的一个插件，可以帮助你快速创建游戏内的表单。包括三种类型的表单(详细说明点击相应表单类型即可)：

- [**Custom**](#custom)
- [**Modal**](#modal)
- [**Form**](#form)

### 如何使用 :question:

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

#### :point_right:创建 Custom 型表单

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

#### :point_right: 创建 Modal 型表单

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

#### :point_right: 创建 Form 型表单

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
### :wrench:配置文件

:heavy_check_mark: **Config_Version：** 配置文件版本。

:heavy_exclamation_mark: **Auto_Hide_Error_Form：** 创建表单失败自动隐藏错误表单。默认关闭。

:heavy_check_mark: **Default_Require_Text：** 当必要内容为空时自动填充的内容。

:heavy_check_mark: **Step_Bar_Empty：** 当步骤条为空填充默认内容。默认：["E", "R", "R", "O", "R"]

:heavy_check_mark: **Dropdown_Empty：** 当下拉菜单为空填充默认内容。默认：["E", "R", "R", "O", "R"]

:heavy_check_mark: **Default_Img：** 当图片地址为空时默认图片。默认："textures/blocks/redstone_block.png"

:heavy_check_mark: **Color_Symbol：** 自定义颜色符。默认：§

### 获取表格数据

返回一个包含当前表格数据的数组：

```php
$Data = $Example->getFormData();
```


### 获取表格数据
返回一个包含当前表格数据的数组：
```php
$Data = $Example->getFormData();
```

### 关于回调函数

没有这个表单就只是展示的东西。你肯定需要它。:hear_no_evil:

**回调函数示例**

```php
// $player 为操作表单的玩家对象。$data 为操作表单后（表单被关闭）返回的数据。
$Example = $this->plugin->Form->CreateCustomForm("Example Form", function (Player $player, $data) {
    $this->plugin->getLogger()->info(var_dump($data));
    // .... 你想做的事。
});
```

**返回数据$data说明**

Custom 型表单：返回一个数组。

Modal 型表单：返回布尔值。

Form 型表单：返回被点击按钮的索引。

### 表单类型介绍

#### Custom

## ![Custom1](https://github.com/zRains/GForm/blob/master/img/Custom1.jpg?raw=true)

![Custom2](https://github.com/zRains/GForm/blob/master/img/Custom2.jpg?raw=true)

#### Modal

![Modal](https://github.com/zRains/GForm/blob/master/img/Model.jpg?raw=true)

#### Form

![Form](https://github.com/zRains/GForm/blob/master/img/Form.jpg?raw=true)
