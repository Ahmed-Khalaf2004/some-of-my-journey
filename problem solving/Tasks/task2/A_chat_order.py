# for sure the DS to solve this is set but how? ( i think we solve a close prob to this at lecture two)
# so last one message will be at the top of output list

n = int(input())
messages = [input().strip() for _ in range(n)]

otp = []
already_exist = set()

# so at first i thougt at this idea:
# case 1: already at list if: case 1 proccess
# case 2: not at list else: case 2 proccess

# but the next is idea is less complexity and more usefull
# reversed: for read the list from new to old
for name in reversed(messages):
    if name not in already_exist:
        already_exist.add(name)
        otp.append(name)

for name in otp:
    print(name)

        


