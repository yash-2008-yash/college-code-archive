# Experiment 15 - Write a shell program to find the smallest digit of a value

`small.sh`
```bash
#!/bin/bash

echo "Enter a number:"
read n

min=9

while [ $n -gt 0 ]
do
    digit=$((n % 10))

    if [ $digit -lt $min ]
    then
        min=$digit
    fi

    n=$((n / 10))
done

echo "Smallest digit is: $min"
```

To run this file:
```
bash small.sh
```

OUTPUT:
```
Enter a number:
132
Smallest digit is: 1
```