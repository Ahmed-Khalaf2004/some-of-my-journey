# priority queue is the best for this
# so at pq we push the lengthes then take every length and test if ood or even then take the index for this length and according to lenght if ood or even push its value to answer list
# heapq at python = pq at c++ but return the min not max, so we push the lenghts with - to return the max

import heapq

t = int(input())
for _ in range(t):
    n = int(input())

    # -n to found the max not the min
    hq = [(-n, 1, n)]
    heapq.heapify(hq)

    # initiate the list with 0's
    res = [0] * (n + 1)
    
    for i in range(1, n + 1):
        neg_len, l, r = heapq.heappop(hq)
        # to return the lenght to positive after we change it to neg at line 12
        length = -neg_len

        if length % 2 == 1:
            mid = (l + r) // 2
        else:
            mid = (l + r - 1) // 2
            
        res[mid] = i

        # so after we change then mid we now have two parts right(before mid) | left(after mid)
        if l <= mid - 1:
            left_len = (mid - 1) - l + 1
            heapq.heappush(hq, (-left_len, l, mid - 1))
            
        if mid + 1 <= r:
            right_len = r - (mid + 1) + 1
            heapq.heappush(hq, (-right_len, mid + 1, r))
            
    print(*(res[1:]))