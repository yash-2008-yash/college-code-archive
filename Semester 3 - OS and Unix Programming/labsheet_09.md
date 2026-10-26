# Experiment 9 - Write a Shell program to find the factorial of a number

`factorial.sh`
```bash
#!/bin/bash

echo -n "Enter a number: "
read n                          # take input from user

fact=1                          # start with 1
i=1                             # counter

while [ $i -le $n ]; do         # repeat from 1 up to n
    fact=$(( fact * i ))        # multiply fact by i
    i=$(( i + 1 ))              # move to next number
done

echo "Factorial of $n is $fact"
```

To run this file:
```
bash factorial.sh
```

OUTPUT:
```
Enter a number: 5
Factorial of 5 is 120
```