#include <iostream>
#include <vector>
#include <algorithm>
#include <string>

using namespace std;
void solve()
{
    int n, a, b, c;
    cin >> n >> a >> b >> c;
    int mx = max(a, b, c);

    if (mx == a)
    {
        while (a)
        {
            cout << 'R';
            if (b)
            {
                cout << 'B';
                b--;
            }
            else if (c)
            {
                cout << 'G';
            }
            else
            {
                cout << -1;
                return;
            }
            a--;
        }
        if (b + c)
        {
            int mx2 = max(b, c);
            if (mx2 == b)
            {
                while (b)
                {
                    cout << 'B';
                    b--;
                    if (c)
                    {
                        cout << 'G';
                        c--;
                    }
                    else
                    {
                        if (b > 1)
                        {
                            cout << -1;
                            return;
                        }
                    }
                }
            }
        }
    
    }
    else if (mx == b)
    {
        while (b)
        {
            cout << 'B';
            if (a)
            {
                cout << 'R';
                a--;
            }
            else if (c)
            {
                cout << 'G';
            }
            else
            {
                cout << -1;
                return;
            }
            b--;
        }
           if (a + c)
        {
            int mx2 = max(a, c);
            if (mx2 == a)
            {
                while (a)
                {
                    cout << 'R';
                    a--;
                    if (c)
                    {
                        cout << 'G';
                        c--;
                    }
                    else
                    {
                        if (a > 1)
                        {
                            cout << -1;
                            return;
                        }
                    }
                }
            }
        }
    
    }
    else if (mx == c)
    {
        while (c)
        {
            cout << 'G';
            if (b)
            {
                cout << 'B';
                b--;
            }
            else if (a)
            {
                cout << 'R';
            }
            else
            {
                cout << -1;
                return;
            }

            c--;
        }
           if (a + b)
        {
            int mx2 = max(a, b);
            if (mx2 == b)
            {
                while (b)
                {
                    cout << 'B';
                    b--;
                    if (a)
                    {
                        cout << 'R';
                        a--;
                    }
                    else
                    {
                        if (b > 1)
                        {
                            cout << -1;
                            return;
                        }
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
    int t;
    cin >> t;
    while (t--)
    {
        solve();
    }

    return 0;
}