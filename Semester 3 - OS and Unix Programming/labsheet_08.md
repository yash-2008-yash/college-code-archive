# Experiment 8 - Write a Shell program to check the given year is leap year or not

`leap_year.sh`
```bash
#!/bin/bash

echo -n "Enter a year: "
read year                                   # take input from user

if [ $(( year % 400 )) -eq 0 ]; then        # divisible by 400 -> leap
    echo "$year is a leap year"
elif [ $(( year % 100 )) -eq 0 ]; then      # divisible by 100 (but not 400) -> not leap
    echo "$year is not a leap year"
elif [ $(( year % 4 )) -eq 0 ]; then        # divisible by 4 (but not 100) -> leap
    echo "$year is a leap year"
else                                        # everything else -> not leap
    echo "$year is not a leap year"
fi
```

To run this file:
```
bash leap_year.sh
```

OUTPUT:
```
Enter a year: 2008
2008 is a leap year
```

```
Enter a year: 2026
2026 is not a leap year
```