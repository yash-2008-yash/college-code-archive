# Experiment 10 - Write a Shell program to swap the two integers

`swap.sh`
```bash
#!/bin/bash

echo -n "Enter first number: "
read a
echo -n "Enter second number: "
read b

echo "Before swap: a = $a, b = $b"

temp=$a
a=$b
b=$temp

echo "After swap:  a = $a, b = $b"
```

To run this file:
```
bash swap.sh
```

OUTPUT:
```
Enter first number: 10
Enter second number: 5
Before swap: a = 10, b = 5
After swap: a = 5, b = 10
```