# Dynalist content export Markdown

## Notice:
    - Note need append "> " or "`"
    ![]()

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
