# Experiment 16 - Write a shell script to perform integer arithmetic operations

`arithmetic.sh`
```bash
#!/bin/bash

echo "Enter two integers:"
read a b

echo "Addition: $((a + b))"
echo "Subtraction: $((a - b))"
echo "Multiplication: $((a * b))"
echo "Division: $((a / b))"
echo "Modulus: $((a % b))"
```

To run this file:
```
bash arithmetic.sh
```

OUTPUT:
```
Enter two integers:
10 5
Addition: 15
Subtraction: 5
Multiplication: 50
Division: 2
Modulus: 0
```