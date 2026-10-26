# Experiment 13 - Write a Shell program to display a given message

`message.sh`
```bash
#!/bin/bash

echo -n "Enter a message:"
read message

echo "Your message is: $message"
```

To run this file:
```
bash message.sh
```

OUTPUT:
```
Enter a message: Surprise, motherfucker!
Your message is: Surprise, motherfucker!
```