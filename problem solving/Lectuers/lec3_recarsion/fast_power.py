def p(n,e):
    if e == 0: return 1
    h = p(n, e//2)
    if  e%2 == 0: return h * h
    return h * h * n

# case 1:
# 2 e 4 = 16
# case 2:
# 2 e 5 = 32

print(p(2,5))