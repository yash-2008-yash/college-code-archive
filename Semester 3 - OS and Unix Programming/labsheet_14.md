# Experiment 14 - Write a Shell Program to find the roots of the quadratic equation

`quadratic.sh`
```bash
#!/bin/bash

echo "Enter coefficients a, b and c:"
read a b c

d=$(echo "$b * $b - 4 * $a * $c" | bc)

if (( $(echo "$d > 0" | bc -l) )); then
    r1=$(echo "scale=2; (-$b + sqrt($d)) / (2 * $a)" | bc -l)
    r2=$(echo "scale=2; (-$b - sqrt($d)) / (2 * $a)" | bc -l)
    echo "Roots are real and distinct: $r1 and $r2"
elif (( $(echo "$d == 0" | bc -l) )); then
    r=$(echo "scale=2; -$b / (2 * $a)" | bc -l)
    echo "Roots are real and equal: $r"
else
    echo "Roots are imaginary"
fi
```

To run this file:
```
bash quadratic.sh
```

OUTPUT:
```
Enter coefficients a, b and c:
3 2 -2
Roots are real and distinct: .54 and -1.21
```
```
Enter coefficients a, b and c:
4 5 3
Roots are imaginary
```
```
Enter coefficients a, b and c:
1 2 1
Roots are real and equal: -1.00
```