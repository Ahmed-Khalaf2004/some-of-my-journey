n = int(input())
nums = list(map(int, input().split()))
nums.sort()
flag = True
for i in nums:
    if(i == nums.index(i) + 1):
        pass
    else:
        print(nums.index(i)+1)
        flag = False
        break

if(flag):
    print(len(nums) + 1)