#include <iostream>
#include <vector>
#include <algorithm>
#define all(x) x.begin(), x.end()
using namespace std;
long long w, h, n;
bool good(long long x)
{
    return (x / w) * (x / h) >= n;
}
void solve()
{
    cin >> w >> h >> n;
    long long l(0), r(1);
    while (!good(r))
    {
        r *= 2;
    }

    long long mid;
    // l < r + 1
    while (r > l + 1)
    {
        mid = (l + r) / 2;
        if (good(mid))
        {
            r = mid;
        }
        else
        {
            l = mid;
        }
    }
    cout << r << endl;
}
int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
}