# php-Ketama

```
 $ketama = new Ketama();
 $ketama->addNode("table_name_01",666);
 $ketama->addNode("table_name_02",666);
 $ketama->create();

 print_r($ketama->getNode(2060));
 print_r($ketama->getNode(2065));
 print_r($ketama->getNode(2096));
```
out
```
table_name_02
table_name_02
table_name_02
```
