#Simple Blog Written in PHP
运用 PHP and MySQL Web Development 的知识，使用原生 PHP 代码写的 Blog 程序，不依赖其他框架。一些辅助功能大概会使用插件。    
原想用面向对象方式编写，书上这方面的内容近乎为零，也就转作别的模式。把各功能函数分离到相关的独立文件，使用 include（） 方式导入，调用时显得也算整洁。    
有一点需要注意，代码文件应该放在服务器根目录的 blog （新建这个文件夹）下。源码有一些路径硬编为 http://127.0.0.1/blog 。