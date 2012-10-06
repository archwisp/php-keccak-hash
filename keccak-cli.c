#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "KeccakNISTInterface.h"

#define BUF_SIZE 1024

void readInput(char *buffer, const unsigned int buffer_size);

int main(void)
{
    unsigned char data[BUF_SIZE];
    unsigned char result[64];
    unsigned int x;

    memset(data, 0, sizeof data);
    memset(result, 0, sizeof result);
    
    readInput(data, BUF_SIZE);
    
    size_t len = strlen(data); 
    Hash(512, data, len * 8, result);
   
    unsigned int hash_length = sizeof(result);

    for (x = 0; x < hash_length; x++) {
        printf("%02x", result[x]);
    }
        
    printf("\n");
    
    return 0;
}

void readInput(char *buffer, const unsigned int buffer_size)
{
    size_t contentSize = 1;
    char *content = malloc(sizeof(char) * buffer_size);
    
    if (content == NULL)
    {
        perror("Failed to allocate content");
        exit(1);
    }

    content[0] = '\0';

    while (fgets(buffer, buffer_size, stdin))
    {
        char *old = content;
        contentSize += strlen(buffer);
        content = realloc(content, contentSize);

        if (content == NULL)
        {
            perror("Failed to reallocate content");
            free(old);
            exit(2);
        }

        strcat(content, buffer);
    }

    if (ferror(stdin))
    {
        free(content);
        perror("Error reading from stdin.");
        exit(3);
    }
}
