# map is the best for this for sure
t = int(input())
for _ in range(t):
    n = int(input())
    a = list(map(int, input().split()))
    
    counts = {}
    ans = 0
    # enumerate(a, 1) because we need the index start from 1 
    for i, val in enumerate(a, 1):
        key = val - i
        if key in counts:
            ans += counts[key]
            counts[key] += 1
        else:
            counts[key] = 1
            
    print(ans)
