#!/bin/bash

# Exit on fail
set -e

# Start services
if [ ${ENVIROMENT} = "PROD" ]; then
    yarn start
else
    # Bundle install
    yarn install
    yarn run dev
fi

# Finally call command issued to the docker service
exec "$@"

