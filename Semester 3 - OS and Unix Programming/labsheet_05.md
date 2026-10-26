# Experiment 5 - Program for simulation of `ls` Unix commands


`exp_5.c`
```c
#include <stdio.h>
#include <stdlib.h>
#include <dirent.h>

int main(int argc, char *argv[]) {
	DIR *dp;
	struct dirent *entry;
	char *path = (argc > 1) ? argv[1] : ".";

	dp = opendir(path);
	if (dp == NULL) {
		perror("Cannot open directory");
		exit(1);
	}

	while ((entry = readdir(dp)) != NULL) {
		if (entry->d_name[0] != '.')        // skip hidden files, like plain 'ls'
			printf("%s\t", entry->d_name);
	}
	printf("\n");

	closedir(dp);
	return 0;
}
```

To run this file:
```
gcc exp_5.c -o exp_5 && ./exp_5
```

OUTPUT:
```
a.out   main.c
```