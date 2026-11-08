s = input()
modify_s = s[1:]
index = 0
cnt = 1
chars_iteration = []

# alllla
for i in modify_s:
    if(index > len(s)):
        break
    if i == s[index]:
        cnt+=1
        index+=1
    else:
        chars_iteration.append(cnt)
        cnt = 1
        index+=1

chars_iteration.append(cnt)
print(max(chars_iteration))
