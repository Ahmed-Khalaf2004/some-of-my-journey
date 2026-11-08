# input: the size of cupes, mession: find the min tower nums

# whats the proccess and whats the appropriate DS?
# i think map is the best for this 
# the keys: will be the base of tower, 
# and the values: is whats lower than this key base,
# and the output is num of keys

# secound idea just come to me, i think it will be better and easer:
# do a list and for each new element search at list for gratter element than this new, if found replace the gratter with the new if didnt add the new to list
# this will be O(ne2) will need(nested for) so it will fail lets return back to the first idea

# ok now i am sure that multiset is the best for this q, but i will try with map because there is no multiset at python :(
# n = int(input())
# cupes = list(map(int, input().split()))

# towers = dict()
# for c in cupes:
#     grater_than_c = []
#     for k in towers:
#         if(k > c):
#             grater_than_c.append(k)
    
#     # case 1: if c less than keys
#     if(grater_than_c):
#         target = min(grater_than_c)
        
#         towers[target] -= 1
#         if towers[target] == 0:
#             del towers[target]
            
#         towers[c] = towers.get(c, 0) + 1


#     # case 2: if c grater than keys
#     else:
#         towers[c] = towers.get(c, 0) + 1

# print(sum(towers.values()))

# i think this search part at my previes submition is the cause of time limit excede:
# for k in towers:
#         if(k > c):
#             grater_than_c.append(k) 
# so now i will try binary search with the same idea:
n = int(input())
cupes = list(map(int, input().split()))

towers = []

for c in cupes:
    low = 0
    high = len(towers) - 1
    idx = -1
    
    while low <= high:
        mid = (low + high) // 2
        if towers[mid] > c:
            idx = mid      
            high = mid - 1 
        else:
            low = mid + 1  
            
    if idx != -1:
        towers[idx] = c
    else:
        towers.append(c)

    

print(len(towers))