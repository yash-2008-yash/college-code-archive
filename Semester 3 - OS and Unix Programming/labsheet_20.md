# Experiment 20 - Write a shell program to count the number of digits of a value

`count.sh`
```bash
#!/bin/bash

echo -n "Enter a number:"
read n

count=0

while [ $n -gt 0 ]
do
    n=$((n / 10))
    count=$((count + 1))
done

echo "Number of digits: $count"
```

To run this file:
```
bash count.sh
```

OUTPUT:
```
Enter a number: 6769
Number of digits: 4
```