# Dynalist content export Markdown

## Notice:
    - In dynalist Note need append "> " or "`"
    

    ![Screen Shot 2018-07-20 at 16.49.41.png](https://github.com/NominationP/dynalist_export_markdown/blob/master/Screen%20Shot%202018-07-20%20at%2016.49.41.png)

## Trans Regulation

```
$ruler =    [                  
                "0"=>"#",           // blank space : 0
                "4"=>"##",          // blank space : 4
                "8"=>"-",           // blank space : 8
                "`"=>"\n```\n",     
                "!"=>"!",
                "#"=>"@",
                ">"=>"> ",
            ];
```                        


## Operate

1. put file to example/
2. modified run.php ==> file path
3. run run.php ==> markdown file apear in example/....md
