# Experiment 17 - Write a shell program to reverse a number

`reverse.sh`
```bash
#!/bin/bash

echo "Enter a number:"
read n

rev=0

while [ $n -gt 0 ]
do
    digit=$((n % 10))
    rev=$((rev * 10 + digit))
    n=$((n / 10))
done

echo "Reversed number: $rev"
```

To run this file:
```
bash reverse.sh
```

OUTPUT:
```
Enter a number: 2026
Reversed number: 6202
```