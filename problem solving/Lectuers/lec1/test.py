# num = 8
# l = []
# for i in l:
#     if(i > num):
#         continue
#     else:
#         searsh = num - i
#         new_l = l[i:]
#         for j in new_l:
#             if(searsh == j):
#                 print(l.index(i))
#                 print(searsh)

def solve():
    n, x = map(int, input().split())
    
    v = list(map(int, input().split()))
    
    mp = {}
    idx = {}
    
    for i in range(n):
        if (x - v[i]) in mp:
            print(f"{idx[x - v[i]]} {i + 1}")
            return
        
        mp[v[i]] = True
        idx[v[i]] = i + 1
        

solve()