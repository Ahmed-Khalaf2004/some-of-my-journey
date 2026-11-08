#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    // sum the digits of the nums then test if % 9 == 0, if yes output YES,
    // else we will made a two varibals the first is two_count and the secound is three_count,
    //  then i have to ideas and i dont know which better:
    // 1. test according to the two_count  and three_count untill success.
    // 2. calculate the difference between the sum of digits and the first grater num that vertify %9 == 0.
    int t;
    cin >> t;
    while (t)
    {
        t--;
        // 322
        string n;
        cin >> n;
        int sum = 0;
        int two_count(0), three_count(0);
        for (int i = 0; i < n.length(); i++)
        {
            sum += n[i] - '0';
            if (n[i] - '0' == 2)
            {
                two_count += 1;
            }
            if (n[i] - '0' == 3)
            {
                three_count += 1;
            }
        }
        if (sum % 9 == 0)
        {
            cout << "YES" << endl;
            return;
        }
        else
        {
            if (three_count == 0 && two_count == 0)
            {
                cout << "NO" << endl;
                return;
            }
            for (int i = 0; i < two_count; i++)
            {
                if ((sum - 2 + 4) % 9 == 0)
                {
                    cout << "YES" << endl;
                    return;
                }
                for (int j = 0; j < three_count; j++)
                {
                    if ((sum - 3 + 9) + (sum - 2 + 4) % 9 == 0)
                    {
                        cout << "YES" << endl;
                        return;
                    }
                }
            }
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
