def sub(i,n,l):
    if n == len(l) - 1: return [l[i],l[n]]
    return sub(i,n+1,l)

    

# [1,2,3,4,5]
# [1,2] [1,3] [1,4] [1,5] [1,2,3,4,5]
# [2,3] [2,4] [2,5] [2,3,4,5]

l = [1,2,3]
print(sub(0,1,l))