umask 002

export TERM=xterm

if [ -x /usr/bin/dircolors ]; then
    test -r ~/.dircolors && eval "$(dircolors -b ~/.dircolors)" || eval "$(dircolors -b)"
    alias ls='ls --color=auto'
    alias grep='grep --color=auto'
    alias fgrep='fgrep --color=auto'
    alias egrep='egrep --color=auto'
fi

alias ll='ls -ahl'
alias ownr='chown -R www-data:www-data .'
alias usr='su www-data'
alias cs-fix='bin/php-cs-fixer fix'
alias art='php artisan'
alias migrate='php artisan migrate'
alias serve='php artisan serve'
alias fresh='php artisan migrate:fresh --seed'
alias t='bin/phpunit'
alias robo='bin/robo'

if [ -f ~/.bash_aliases ]; then
    . ~/.bash_aliases
fi
