#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

// 7
// 9 5 7 7 4 7 7

// sort:
// 4 5 7 7 7 7 9
// median = v[n/2] = 7

// before = 9 5 7 => sort => 5 7 9 => median = 7 => ans++
// median = 7 => ans++
// after = 4 7 7 => ans++


// 7
// 2 2 1 2 3 2 2
// 1 1 0 1 0 1 1
// 

// sort:
// 1 2 2 2 2 2 3
// 0 0 0 1 0 0 0 
// 0 1 0 1 0 1 0
// median = 2
// before => 1 2 2 
// median => 2
// after => 2 2 3

using namespace std;
void solve()
{
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}