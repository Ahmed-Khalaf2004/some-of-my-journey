# the same stack solution at lec with different direction
n = int(input())

v = list(map(int, input().split()))

ans = [0] * n
s = []

for i in range(n):
    while s and s[-1][0] >= v[i]:
        s.pop()
    
    if s:
        ans[i] = s[-1][1] + 1
    
    s.append((v[i], i))
    
print(*(ans))

