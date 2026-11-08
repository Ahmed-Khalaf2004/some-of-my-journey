#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;

vector<int> v;
long long fact(int n)
{
    return fact(n) * fact(n - 1);
}
bool check(long long x, long long f, int n)
{
    return fact(x) % 10 == n;
}
void solve()
{
    int n;
    cin >> n;
    // 1

    // 5
    // 5 6 7 8 9

    long long f = fact(n);
    long long l(0), r(1e15);
    while (r > l + 1)
    {
        long long mid = (l + r) / 2;
        vector<int> l;
        int i = 0;
        if (check(mid, f, n))
        {
            mid = r;
            l[i] = mid;
            i++;
        }
        else
        {
            mid = l;
        }
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
    return 0;
}