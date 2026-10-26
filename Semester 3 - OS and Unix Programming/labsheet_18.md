# Experiment 18 - Write a shell program to find the sum of even and odd numbers in an array

`array.sh`
```bash
#!/bin/bash

echo "Enter the number of elements:"
read n

echo "Enter array elements:"
for ((i=0; i<n; i++))
do
    read arr[$i]
done

even=0
odd=0

for ((i=0; i<n; i++))
do
    if (( arr[i] % 2 == 0 ))
    then
        even=$((even + arr[i]))
    else
        odd=$((odd + arr[i]))
    fi
done

echo "Sum of even numbers: $even"
echo "Sum of odd numbers: $odd"
```

To run this file:
```
bash array.sh
```

OUTPUT:
```
Enter the number of elements:
5
Enter array elements:
10
20
50
13
3
Sum of even numbers: 80
Sum of odd numbers: 16
```