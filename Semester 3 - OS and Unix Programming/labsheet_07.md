# Experiment 7 - Write a Shell program to check the given number is even or odd

`odd_even.sh`
```bash
#!/bin/bash

echo -n "Enter a number: "
read n    # take input from user

rem=$(( n % 2 ))    # remainder when divided by 2

if [ $rem -eq 0 ]; then   # remainder 0 -> even
    echo "$n is an even number"
else    # otherwise -> odd
    echo "$n is an odd number"
fi
```

To run this file:
```
bash odd_even.sh
```

OUTPUT:
```
Enter a number: 5
5 is an odd number
```

```
Enter a number: 10
10 is an even number
```