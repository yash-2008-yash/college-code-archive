# Experiment 19 - Write a shell script to print the sum of n natural numbers

`sum.sh`
```bash
#!/bin/bash

echo -n "Enter a number:"
read n

sum=0

for ((i=1; i<=n; i++))
do
    sum=$((sum + i))
done

echo "Sum of $n natural numbers is: $sum"
```

To run this file:
```
bash sum.sh
```

OUTPUT:
```
Enter a number: 10
Sum of 10 natural numbers is: 55
```