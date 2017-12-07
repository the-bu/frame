# Best框架
## 目录结构
```
frame  (框架根目录)
├──app  (应用)             
│   └──home  (模块)
│   │    └──controller 
│   │    │    └──index  (控制器)
│   │    └──view  (视图层)
│   │    │    └──index
│   │    │    │    └──index.php  (模版文件)
├──best  (系统核心)                
│   └──core 
│   │    └──Boot.php  (启动类)
│   │    └──Controller.php  (核心控制器类)
│   └──model  (模型类 )
│   │    └──Base.php  (模型基类)
│   │    └──Model.php  (核心模型类)
├──public  (公共资源)
│   └──static  (静态文件)
│   └──view  (公共视图文件)
│   └──index.php  (入口文件)    
├──system  (系统配置)           
│   └──config  (配置项)
│   │    └──datebase.php  (数据库配置项)
│   │    └──view.php  (视图配置项)
│   └──model  (处理逻辑业务的模型类)
│        └──Student.php   
└──vendor  (composer生成自动加载文件)          
```












              
