# so hint is recursion (impossible to know by myself without the hint)
# input: num | mession: min num grater than input that contain just 4's = 7's 
# process:
# whats the best DS for this? how recursion will be the best to solve this?
# lets write the first possibilities hope to note pattern:
# 47
# 74
# 4477
# 4747
# 4774
# 7447
# 7474
# 7744
# 444777 
# 447477
# first idea:
# ok what we are sure about:
#  answer will always be even because 4's = 7's
#  i think there is a magic 3 static equasion to solve this:
#  if (value =< 4): 
#  elif( value =< 7):

# secound idea (recusrsion):
# add one to num untill 7's == 4's then return this num
# but limit time will excede i think, so we will add more than one each time, 
# lets start by adding ones to test the alg then enhance it 

n = int(input())
# try 1:
# def find_lucky_num(n):
#     s = str(n)
#     if len(s) % 2 == 0 and s.count('4') == s.count('7') and (s.count('4') + s.count('7') == len(s)):
#         print(n)
#         return
#     find_lucky_num(n + 1)
# find_lucky_num(n)
# alg goes will, but absolute time limit excede. 
# so we just need to enhance it by change the + 1 to somthing less complexity.



# try 2: fail because we reset the num with each recursion
# def find_lucky_num(n):
#     s = str(n)
#     if len(s) % 2 == 0 and s.count('4') == s.count('7') and (s.count('4') + s.count('7') == len(s)):
#         return n
#     elif(s[0]<"4"):
#         if len(s) == 1:
#             return 47
#         n = int( "4" + str(3) * (len(s)-1))
#         return find_lucky_num(n + 1)
#     elif(s[0]<"7"):
#         n = int( "7" + str(3) * (len(s)-1))
#         return find_lucky_num(n + 1)
#     else:
#         # here will be more than 7:
#         # two possibilities odd or even:
#         # 1.8000 
#         # we will add two zeros from right then continue solution at case (s[0]<4)
#         # 2.800
#         # we will add one zeros from right then continue solution at case (s[0]<4)
#         if len(s) % 2 == 0:
#             n = int( "4" + str(3) * (len(s)-1) + str(0) * 2)
#             return find_lucky_num(n + 1)
#         else:
#             n = int( "4" + str(3) * (len(s)-1) + str(0))
#             return find_lucky_num(n + 1)
# print(find_lucky_num(n))



# try 3: the same as the try 2, we reset the num outside the recursion
def initial_jump(n):
    s = str(n)
    if len(s) % 2 != 0:
        return int("4" * ((len(s) // 2) + 1) + "7" * ((len(s) // 2) + 1))
    
    if s[0] < "4":
        return int("4" + "3" * (len(s) - 1))
    elif s[0] < "7":
        return int("7" + "3" * (len(s) - 1))
    else:
        return int("4" + "3" * len(s))

def find_lucky_num(current):
    s = str(current)
    if len(s) % 2 == 0 and s.count('4') == s.count('7') and (s.count('4') + s.count('7') == len(s)):
        return current
    return find_lucky_num(current + 1)

start_num = initial_jump(n)
print(find_lucky_num(start_num))