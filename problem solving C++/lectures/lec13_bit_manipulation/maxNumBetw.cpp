#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    long long l, r;
    cin >> l >> r;
    long long mx = l ^ r;
    if (mx == 0)
    {
        cout << 0 << endl;
    }
    else
    {
        long long shift = __lg(mx) + 1;
        cout << (1 << shift) - 1 << endl;
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}