# # we have two metions: find the missing nums before the k, k nums
# t = int(input())
# while t:
#     t -= 1
#     n, k = list(map(int, input().split()))
#     l = list(map(int, input().split()))
#     l.sort()
    
#     smaller_than_k = set()
#     count_k = 0
    
#     for i in l:
#         if i == k:
#             # case 2
#             count_k += 1
#         elif i < k:
#             # case 1
#             smaller_than_k.add(i)
            
#     missing_below_k = k - len(smaller_than_k)
    
#     print(missing_below_k + count_k)

t = int(input())
while t:
    t -= 1
    n, k = list(map(int, input().split()))
    l = list(map(int, input().split()))
    l.sort()
    
    smaller_than_k = set()
    count_k = 0
    
    for i in l:
        if i == k:
            count_k += 1
        elif i < k:
            smaller_than_k.add(i)
            
    missing_below_k = k - len(smaller_than_k)
    # faild here at first try because operation can happen at the two cases
    # print(missing_below_k + count_k)
    print(max(missing_below_k, count_k))
