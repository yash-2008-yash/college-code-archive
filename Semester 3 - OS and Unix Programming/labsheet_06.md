# Experiment 6 - Program for simulation of `grep` Unix commands

`exp_6.c`
```c
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
 
int main(int argc, char *argv[]) {
    FILE *fp;
    char line[1024];
    int lineNo = 0, found = 0;
 
    if (argc != 3) {
        printf("Usage: %s <pattern> <filename>\n", argv[0]);
        exit(1);
    }
 
    fp = fopen(argv[2], "r");
    if (fp == NULL) {
        perror("Cannot open file");
        exit(1);
    }
 
    while (fgets(line, sizeof(line), fp) != NULL) {
        lineNo++;
        if (strstr(line, argv[1]) != NULL) {
            printf("%d: %s", lineNo, line);
            found = 1;
        }
    }
 
    if (!found)
        printf("Pattern \"%s\" not found in %s\n", argv[1], argv[2]);
 
    fclose(fp);
    return 0;
}
```

To run this file:
```
gcc exp_6.c -o exp_6 && ./exp_6
```

OUTPUT:
```
Usage: ./a.out <pattern> <filename>
```