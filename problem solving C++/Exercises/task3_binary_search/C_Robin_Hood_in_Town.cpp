// sorry python, its time to go :<
#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
// 4
// 1 2 3 4
// In the fourth test case, after adding 15 gold, the average wealth becomes 25/4, and half of this average is 25/8, resulting in 3 people being unhappy.
bool check(long long x, vector<long long> welth, long long n, long long sum)
{
    // sum the whole welthes, then add x untill the avg > than mid_element, then Robin Hood will come and find x
    double avg = (double)(sum + x) / n;
    return welth[n / 2] < avg / 2;
}
void solve()
{
    int t;
    cin >> t;
    while (t)
    {
        t -= 1;
        long long n;
        cin >> n;
        vector<long long> v(n);
        for (long long i = 0; i < n; i++)
        {
            cin >> v[i];
        }
        sort(v.begin(), v.end());
        if (n <= 2)
        {
            cout << -1 << '\n';
            continue;
        }
        long long sum = 0;
        for (long long i = 0; i < n; i++)
        {
            sum += v[i];
        }

        // x can be 0, so l must be less than 0
        long long l(-1), r(1e18);
        while (r > l + 1)
        {
            long long mid = (l + r) / 2;
            if (check(mid, v, n, sum))
            {
                r = mid;
            }
            else
            {
                l = mid;
            }
        }
        cout << r << '\n';
    }
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);
    solve();
}